// import React from 'react'
import {Link, usePage} from '@inertiajs/react'

export default function Nav() {
    const { auth } = usePage().props as any;
//     const { auth } = usePage().props;
// const user = auth?.user;

  return (
    <nav className='bg-white shadow-md border-b py-2'>
            <div className="max-w-7xl mx-auto px-4 sm:px-6 ls:px-8">
                <div className="flex justify-between h-16">
                  <div className="flex items-center">
                    <Link href="/" className="text-2xl font-black text-indigo-600">
                      My App
                    </Link>
                  </div>
                  {/* <div className="flex items-center space-x-4">
                    {/* { auth.user ?(
                      <Link href="{route=('dashboard')}" className='inline-flex items-center px-4 py-2'>Tableau de bord</Link>
                    ):
                    (
                      <>
                      <Link href="{route=('dashboard')}">Tableau de bord</Link>
                      </>                      
                    )} 
                  </div> */}
                                    
                  <div className="flex items-center space-x-4">
                  {auth && auth.user ? (
                    <Link href={route('dashboard')} className="inline-flex items-center px-4 py-2 border test-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                      Tableau de bord
                    </Link>
                  ) : (
                    <>
                    <Link href={route('login')} className="inline-flex items-center px-4 py-2">
                      Connexion
                    </Link>

                    <Link href={route('register')} className="inline-flex items-center px-4 py-2">
                      Inscription
                    </Link>
                    </>
                    // <Link href={route('dashboard')} className="inline-flex items-center px-4 py-2 
                    // // border test-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700
                    // ">
                    //   Tableau de bord
                    // </Link>

                    // <Link href={route('register')} className="inline-flex items-center px-4 py-2 border test-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    //   Inscription 
                    // </Link>

                    // <Link href={route('dashboard')} className="inline-flex items-center px-4 py-2 border test-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    //   Connexion
                    // </Link>
                  )}
                  {/* {auth && auth.user ? (
                    <Link href={route('dashboard')}>Tableau de bord</Link>
                  ) : (
                    <Link href={route('login')}>Connexion</Link>
                  )} */}

                  
                  </div>
                  
                </div>
            </div>
        </nav>    
  )
}
