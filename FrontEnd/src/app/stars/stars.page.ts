import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-stars',
  templateUrl: './stars.page.html',
  styleUrls: ['./stars.page.scss'],
})
export class StarsPage implements OnInit {

  profile: any ;
  stars: {id: number, title: string, price: number, country: string, image: string}[] = [];

  constructor() { 
    this.profile = "data:image/png;base64,"+ localStorage.getItem('pp');
    this.stars.push({id: 1, title: "test", price: 100, country: "Lebanon", image: "../../assets/res/SplashImage.png"});
    this.stars.push({id: 2, title: "test3", price: 200, country: "test", image: "/assets/res/onboardHouse.png"});
    this.stars.push({id: 3, title: "test2", price: 1100, country: "test", image: "/assets/res/onboardHouse.png"});
    this.stars.push({id: 4, title: "test4", price: 1000, country: "test", image: "/assets/res/onboardHouse.png"});
  }

  ngOnInit() {
  }

}
