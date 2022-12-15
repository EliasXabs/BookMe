import { Component } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  profile: any ;
  properties: {id: number, title: string, price: number, country: string, image: string}[] = [];

  constructor() {
    this.profile = "data:image/png;base64,"+ localStorage.getItem('pp');
    this.properties.push({id: 1, title: "test", price: 100, country: "test", image: "../../assets/res/SplashImage.png"});
    this.properties.push({id: 2, title: "test3", price: 200, country: "test", image: "/assets/res/onboardHouse.png"});
    this.properties.push({id: 3, title: "test2", price: 1100, country: "test", image: "/assets/res/onboardHouse.png"});
    this.properties.push({id: 4, title: "test4", price: 1000, country: "test", image: "/assets/res/onboardHouse.png"});
  }
  
  ngoninit() {
  }
}
