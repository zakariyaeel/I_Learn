import db from "./db";

export async function getUserCount() {
  const [rows] = await db.query<any[]>('SELECT COUNT(*) as count FROM users WHERE role = "customer"');
  return rows[0].count;
}

export async function getInvoice(){
    const [data] = await db.query<any[]>('SELECT SUM(total) as total FROM orders');
    return data[0].total;
}

export async function getOrders(){
    const [rows] = await db.query<any[]>('select count(*) as count from orders');
    return rows[0].count;
}

export async function getCategories(){
    const [rows] = await db.query<any[]>('select count(*) as num from categories');
    return rows[0].num;
}

export async function getRecentCustomers(){
    const [rows] = await db.query<any[]>(`select * from users 
        where role = "customer" order by(created_at) desc limit 5`);
    return rows;
}

export async function getCatByBudget(){
    const [rows] = await db.query<any[]>(`select c.id, c.name, count(p.id) as ttproduct, sum(oi.price) as revenue from categories c 
        left join products p on c.id = p.category_id
        left join order_items oi on p.id = oi.product_id
        group by c.id,c.name
        order by sum(oi.price) desc
        `)
    return rows;
}