import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { SidebarComponent } from './components/sidebar/sidebar.component';
import { HeaderComponent } from './components/header/header.component';
import { AddsalesComponent } from './components/addsales/addsales.component';
import { ViewsalesComponent } from './components/viewsales/viewsales.component';
import { DashboardComponent } from './components/dashboard/dashboard.component';
import { DetailproductComponent } from './components/detailproduct/detailproduct.component';

@NgModule({
  declarations: [
    AppComponent,
    SidebarComponent,
    HeaderComponent,
    AddsalesComponent,
    ViewsalesComponent,
    DashboardComponent,
    DetailproductComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
