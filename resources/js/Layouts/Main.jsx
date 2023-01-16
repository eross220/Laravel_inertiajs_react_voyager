import React from 'react';
import Helmet from 'react-helmet';
import Navbar from '@/Components/Navbar';
import { usePage } from '@inertiajs/inertia-react';

export default function MainLayout({ header, children }) {
  const { app } = usePage();

  return (
    <>
      <Helmet titleTemplate={`${app.name} | %s`} />
      <Navbar />
      {header}
      <main>
        <div className="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
         
            {children}
          
        </div>
      </main>
    </>
  );
}