'use client';
import { usePathname } from "next/navigation";
import clsx from "clsx";

export default function Layout( {children} : {children : React.ReactNode}){
    const link = 'hover:bg-sky-800 hover:text-stone-50 p-2 block rounded';
    const linkActive = 'text-stone-50 bg-sky-800 border-none';
    
    const pathName = usePathname();
    return (
        <div className="flex flex-row mt-[108px]">
            <aside>
                <nav className="flex flex-col items-start w-64 p-4 bg-white shadow-md aside fixed z-50">
                    <h2 className="text-xl font-bold text-gray-800">Dashboard Navigation</h2>
                    <ul className="space-y-2 w-full mt-5">
                        <li><a href="/dashboard" className={clsx(
                            link,
                            { 'text-stone-50 bg-sky-800 border-none' : pathName === '/dashboard' || pathName === '/dashboard/'}
                        )}>Dashboard Home</a></li>

                        <li><a href="/dashboard/settings" className={
                            clsx(
                                link,
                                { 'text-stone-50 bg-sky-800 border-none': pathName === '/dashboard/invoices' }
                            )
                        }>Invoices</a></li>

                        <li><a href="/dashboard/profile" className={
                            clsx(
                                link,
                                { 'text-stone-50 bg-sky-800 border-none': pathName === '/dashboard/costumers' }
                            )
                        }>Costumers</a></li>
                    </ul>
                </nav>
            </aside>
            <main className="ml-64 flex-grow w-full p-6">
                {children}
            </main>
        </div>
    )
}