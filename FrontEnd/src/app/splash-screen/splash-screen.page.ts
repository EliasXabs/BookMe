import { Component, OnInit } from '@angular/core';

import { Router, UrlTree } from '@angular/router';

@Component({
  selector: 'app-splash-screen',
  templateUrl: './splash-screen.page.html',
  styleUrls: ['./splash-screen.page.scss'],
})
export class SplashScreenPage implements OnInit {

  constructor(public router:Router) { 
  }

  ngOnInit() {
    let view: string | UrlTree;
    const checkView = localStorage.getItem('pageDisplayed');
    if (checkView == "true") {
        view = "/home";
    }
    else {
        view = "/onboard-1";
    }
    localStorage.setItem('pageDisplayed', "true");
    
    setTimeout(() => {
      this.router.navigateByUrl(view);
    }, 5000);
  }

}
