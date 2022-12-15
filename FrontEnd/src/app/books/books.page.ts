import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-books',
  templateUrl: './books.page.html',
  styleUrls: ['./books.page.scss'],
})
export class BooksPage implements OnInit {

  profile: any ;

  constructor() { 
    this.profile = "data:image/png;base64,"+ localStorage.getItem('pp');
  }

  ngOnInit() {
  }

}
