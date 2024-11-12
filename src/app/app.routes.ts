import { Routes } from '@angular/router';
import { ListarCustomersComponent } from './components/listar-customers/listar-customers.component';

export const routes: Routes = [
  { path: '', pathMatch: 'full', redirectTo: 'listar-customers' },
  { path: 'listar-customers', component: ListarCustomersComponent },
];
