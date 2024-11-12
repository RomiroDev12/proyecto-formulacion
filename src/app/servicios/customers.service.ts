import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})

export class CustomersService {
  API_URL = 'http://localhost:3000';
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json'
    })
  }

  constructor(private http: HttpClient) { }

  getAllCustomers() {
    return this.http.get(`${this.API_URL}/customers`);
  }

  getOrdersFromCustomer(customerId: string) {
    return this.http.get(`${this.API_URL}/customers/${customerId}/orders`);
  }

  getOrderDetails(orderId: string) {
    return this.http.get(`${this.API_URL}/orders/${orderId}`);
  }
}