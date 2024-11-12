import { Component } from '@angular/core';
import { CustomersService } from '../../servicios/customers.service';
import { FormGroup, ReactiveFormsModule, FormControl, Validators } from '@angular/forms';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-listar-customers',
  standalone: true,
  imports: [ReactiveFormsModule, CommonModule],
  templateUrl: './listar-customers.component.html',
  styleUrl: './listar-customers.component.css'
})

export class ListarCustomersComponent {
  customerNumber: any;
  orderNumber: any;
  customers: any;

  ordersFromCustomer: any;
  orderData: any;
  orderDetails: any;

  totalPrice: any;
  form!: FormGroup;

  constructor(private service: CustomersService) { }

  ngOnInit(): void {
    this.showAllCustomers();

    this.form = new FormGroup({
      customerNumber: new FormControl('', [Validators.required]),
      orderNumber: new FormControl('', [Validators.required])
    })
  }

  showAllCustomers() {
    return this.service.getAllCustomers().subscribe(res => this.customers = res);
  }

  showAllOrdersFromCustomer() {
    return this.service.getOrdersFromCustomer(this.form.value.customerNumber).subscribe({
      next: (res) => {
        this.ordersFromCustomer = res;
      }
    });
  }

  showOrderDetails() {
    return this.service.getOrderDetails(this.form.value.orderNumber).subscribe({
      next: (res) => {
        this.orderDetails = res;
        this.orderData = this.orderDetails[0][0];
        this.calculateTotal(this.orderDetails);
      }
    });
  }

  calculateTotal(orders: any) {
    const productsList: any = orders[1];
    this.totalPrice = productsList.map((product: any) => {
      return product.quantityOrdered * product.priceEach
    }).reduce(
      (val: number, cur: number) => val + cur,
      0,
    );
  }
}