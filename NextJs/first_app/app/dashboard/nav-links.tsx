'use client';
// This file is a client component, which allows us to use hooks like `usePathname

import Link from 'next/link';
import { usePathname } from 'next/navigation';
import clsx from 'clsx';

export default function NavLinks() {
    const pathName = usePathname();
    const navStyle = "text-blue-500 hover:underline w-[100px] text-center rounded-sm "
    return (
        <nav className="flex flex-row gap-2">
            <Link href="/" className={
                clsx(
                    navStyle,
                    {'border-2 border-solid bg-amber-300' :pathName === '/' }
                )
            }>Home</Link>
            <Link href="/dashboard" className={clsx(
                navStyle,
                {'border-2 border-solid bg-amber-300' : pathName === '/dashboard' }
            )}>Dashboard</Link>
        </nav>
    )
}