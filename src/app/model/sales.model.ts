export class Sale {
    id: number;
    product_id: number;
    quantity: number;
    total: number;
    sale_date: string; // Keep the type as string

    constructor(id: number, product_id: number, quantity: number, total: number, sale_date: string) {
        this.id = id;
        this.product_id = product_id;
        this.quantity = quantity;
        this.total = total;
        this.sale_date = sale_date;
    }
}
