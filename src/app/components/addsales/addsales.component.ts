import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ProductService } from '../../service/product.service';
import { Product } from '../../model/product.model';
import { SalesService } from '../../service/sales.service';
import { Sale } from '../../model/sales.model';

@Component({
  selector: 'app-addsales',
  templateUrl: './addsales.component.html',
  styleUrls: ['./addsales.component.css']
})
export class AddsalesComponent implements OnInit {
  products: Product[] = [];
  sales: Sale[] = [];
  quantity: number = 1; // Default quantity
  startDate: string = ''; // For filtering
  endDate: string = ''; // For filtering

  constructor(private productService: ProductService, private salesService: SalesService) {}

  ngOnInit(): void {
    this.productService.getProducts().subscribe(data => {
      this.products = data;
    }, error => {
      console.error('Error fetching products:', error);
    });
  }

  addSale(product: Product): void {
    const saleDate = new Date().toISOString(); // Convert Date to string
    const sale: Sale = { id: 0, product_id: product.id, quantity: this.quantity, total: product.price * this.quantity, sale_date: saleDate };
    this.salesService.createSale(sale).subscribe(response => {
      console.log(response);
    }, error => {
      console.error('Error creating sale:', error);
    });
  }

  filterSales(): void {
    this.productService.filterSalesByDate(this.startDate, this.endDate).subscribe(data => {
      this.sales = data;
    }, error => {
      console.error('Error fetching sales:', error);
    });
  }
}
