import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AddsalesComponent } from './components/addsales/addsales.component';
import { ViewsalesComponent } from './components/viewsales/viewsales.component';
import { DashboardComponent } from './components/dashboard/dashboard.component';

const routes: Routes = [
  {
    path:'',
    children: [
      {
        path: '',
        redirectTo: 'dashboard',
        pathMatch: 'full',
      },
      {
        path: 'dashboard',
        component: DashboardComponent, 
      },
      {
        path: 'add-sales',
        component: AddsalesComponent, 
      },
      {
        path:'view-sales',
        component: ViewsalesComponent,
      },
    ],
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
