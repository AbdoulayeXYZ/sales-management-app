import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Product } from '../model/product.model';
import { Sale } from '../model/sales.model';

@Injectable({
  providedIn: 'root'
})
export class ProductService {
  private apiUrl = 'http://localhost/projet/sales-management-app/backend/product.route.php';

  constructor(private http: HttpClient) {}

  getProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(this.apiUrl);
  }

  createSale(sale: Sale): Observable<any> {
    const headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    return this.http.post(this.apiUrl, sale, { headers });
  }

  filterSalesByDate(startDate: string, endDate: string): Observable<Sale[]> {
    const headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    const body = { start_date: startDate, end_date: endDate };
    return this.http.post<Sale[]>(`${this.apiUrl}?filter=date`, body, { headers });
  }
}