'use client';

import type { Metadata } from "next";
import { Geist, Geist_Mono } from "next/font/google";
import "./globals.css";
import NavLinks from "./dashboard/nav-links";
import { usePathname } from "next/navigation";



export default function Layout(
  {children} : {children : React.ReactNode}
) {
  const path = usePathname();
  const isDash = path?.startsWith('/dashboard');
  return (
    <html>
  <body className=""> {/* Adjust this if headers' height changes */}
    {/* Main Header */}
    <header className="fixed top-0 left-0 w-full z-50">
      <nav className="flex items-center justify-between p-4 bg-gray-800 text-white">
        <div className="text-lg font-bold">My App</div>
        <NavLinks />
      </nav>
    </header>

    {/* Dashboard Header if applicable */}
    {isDash && (
      <header className="fixed top-[60px] left-0 w-full z-40">
        <div className="bg-sky-800 text-white p-2 text-center">
          <h1 className="text-2xl font-bold">Dashboard Layout</h1>
        </div>
      </header>
    )}

    {/* Main Content Section */}
    <section className="">
      {children}
    </section>
  </body>
</html>

  );
}
