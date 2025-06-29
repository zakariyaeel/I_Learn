
import '@/app/globals.css';
import {getCatByBudget, getCategories, getInvoice, getOrders, getRecentCustomers, getUserCount} from '../lib/queries';
import Link from 'next/link';

export default async function RoutingPage() {
  const userCount = await getUserCount();
  const invoice = await getInvoice(); 
  const orders = await getOrders();
  const categories = await getCategories();
  const recCustomers = await getRecentCustomers();
  const catByBudget = await getCatByBudget();
  return (
    <>
      <h2 className="font-bold text-2xl">Dashboard Page</h2>
      <section className="cards flex flex-row w-full p-3 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 mt-2 mb-3 w-4/4 ">
        <div className="users justify-center p-4 bg-gray-50 rounded-lg shadow w-1/4 me-4">
          <h3 className="text-lg font-semibold">Total Customers</h3>
          <p className="text-4xl text-center font-extrabold">{userCount}</p>
        </div>
        <div className="invoice p-4 bg-gray-50 rounded-lg shadow w-1/4 me-4">
          <h3 className="text-lg font-semibold">Invoice</h3>
          <p className="text-4xl text-center font-extrabold">$ {invoice}</p>
        </div>
        <div className="invoice p-4 bg-gray-50 rounded-lg shadow w-1/4 me-4">
          <h3 className="text-lg font-semibold">Orders</h3>
          <p className="text-4xl text-center font-extrabold">{orders}</p>
        </div>
        <div className="invoice p-4 bg-gray-50 rounded-lg shadow w-1/4 me-4">
          <h3 className="text-lg font-semibold">Categories</h3>
          <p className="text-4xl text-center font-extrabold">{categories}</p>
        </div>
      </section>
      <div className="shortcuts flex flex-row gap-4 w-full">
        <div className="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 lusers ">
            <div className="flex items-center justify-between mb-4">
                <h5 className="text-xl font-bold leading-none text-gray-900">Latest Customers</h5>
                <Link href="/dashboard/customers" className="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    View all
                </Link>
          </div>
          <div className="flow-root">
                <ul role="list" className="divide-y divide-gray-200 text-gray-500">
                    {
                      recCustomers.map((cus)=>{
                        return (
                          <li className="py-3 sm:py-4" key={cus.id}>
                            <div className="flex items-center">
                                <div className="shrink-0">
                                    <img className="w-10 h-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Neil image"/>
                                </div>
                                <div className="flex-1 min-w-0 ms-4">
                                    <p className="text-sm font-medium text-gray-900 truncate">
                                        {cus.name}
                                    </p>
                                    <p className="text-sm text-gray-500 truncate">
                                        {cus.email}
                                    </p>
                                </div>
                            </div>
                        </li> 
                        )
                      })
                    }
                </ul>
          </div>
        </div>
        <div className="list-categories w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8">
          <div className='flex items-center justify-between mb-4'>
            <h5 className="text-xl font-bold leading-none text-gray-900">Categories</h5>
            <Link href="/dashboard/categories" className="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
              View all
            </Link>
          </div>
          <div className="flow-root">
            <ul role="list" className="divide-y divide-gray-200 text-gray-500">
              {
                catByBudget.map((cat) => {
                  return (
                    <li className="py-3 sm:py-4" key={cat.id}>
                      <div className="flex items-center">
                        <div className="flex-1 min-w-0 ms-4">
                          <p className="text-sm font-medium text-gray-900 truncate">
                            {cat.name}
                          </p>
                          <p className="text-sm text-gray-500 truncate">
                            <b>{cat.ttproduct}</b> products
                          </p>
                        </div>
                        <div className="revenue ">
                          <p>{cat.revenue} $</p>
                        </div>
                      </div>
                    </li>
                  );
                })
              }
            </ul>
          </div>
        </div>
      </div>
    </>
  );
}