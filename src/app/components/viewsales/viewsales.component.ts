import { Component, OnInit } from '@angular/core';
import { SalesService } from '../../service/sales.service';
import { Sale } from '../../model/sales.model';

@Component({
  selector: 'app-viewsales',
  templateUrl: './viewsales.component.html',
  styleUrls: ['./viewsales.component.css']
})
export class ViewsalesComponent implements OnInit {
  sales: Sale[] = [];
  searchTerm: string = '';

  constructor(private salesService: SalesService) {}

  ngOnInit(): void {
    this.salesService.getSales().subscribe((data: Sale[]) => {
      this.sales = data;
    });
  }

}