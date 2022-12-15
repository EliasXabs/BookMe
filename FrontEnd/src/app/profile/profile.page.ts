import { Component, OnInit } from '@angular/core';

import { FavoritesService } from '../services/favorites.service';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.page.html',
  styleUrls: ['./profile.page.scss'],
})
export class ProfilePage implements OnInit {

  profile: any ;
  name: any;
  owned: {id: number, title: string, price: number, country: string, image: string}[] = [];
  
  constructor(private service: FavoritesService) {
    this.profile = "data:image/png;base64,"+ localStorage.getItem('pp');
    this.name = localStorage.getItem('username');
    this.owned.push({id: 1, title: "test", price: 100, country: "test", image: "../../assets/res/SplashImage.png"});
    this.owned.push({id: 2, title: "test3", price: 200, country: "test", image: "/assets/res/onboardHouse.png"});
    this.owned.push({id: 3, title: "test2", price: 1100, country: "test", image: "/assets/res/onboardHouse.png"});
    this.owned.push({id: 4, title: "test4", price: 1000, country: "test", image: "/assets/res/onboardHouse.png"});
  }
  
  ngOnInit() {
    console.log(localStorage.getItem('user_id'));
    // this.service.getfavorites((localStorage.getItem('user_id') as string)).subscribe((data: any) => {
    // // console.log("data : " + data[0].id);
    // });
  }
}
