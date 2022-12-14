import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: '',
    redirectTo: 'splash-screen',
    pathMatch: 'full'
  },
  {
    path: 'splash-screen',
    loadChildren: () => import('./splash-screen/splash-screen.module').then( m => m.SplashScreenPageModule)
  },
  {
    path: 'onboard1',
    loadChildren: () => import('./onboard1/onboard1.module').then( m => m.Onboard1PageModule)
  },
  {
    path: 'onboard2',
    loadChildren: () => import('./onboard2/onboard2.module').then( m => m.Onboard2PageModule)
  },
  {
    path: 'onboard3',
    loadChildren: () => import('./onboard3/onboard3.module').then( m => m.Onboard3PageModule)
  },
  {
    path: 'signup',
    loadChildren: () => import('./signup/signup.module').then( m => m.SignupPageModule)
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
