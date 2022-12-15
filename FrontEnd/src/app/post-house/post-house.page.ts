import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-post-house',
  templateUrl: './post-house.page.html',
  styleUrls: ['./post-house.page.scss'],
})

export class PostHousePage implements OnInit {

  profile: any;
  userid: any;
  username: any;
  email: any;
  country: any;
  type: any;
  files: any;

  img: string | undefined;

  tinvalue: any;
  pinvalue: any;
  fileslected?: Blob;

  postinbtn: boolean = true;
  postbtn: String = "post";

  titlehelp: boolean = false;
  titleerror: boolean = true;
  priceerror: boolean = true;

  constructor() { }

  ngOnInit() {
    this.profile = "data:image/png;base64,"+localStorage.getItem('pp');
  }

  checktitle(){
    if(this.tinvalue.length > 3){
      this.titlehelp = true;
      this.titleerror = true;
    } else {
      this.titlehelp = false;
      this.titleerror = true;
    }
  }

  checkprice(){
    if(this.pinvalue.match(/^[0-9]+$/)){
      this.priceerror = true;
    }
    else{
      this.priceerror = false;
    }
  }

  checkall(){
    if(this.priceerror &&
      this.titleerror &&
      this.titlehelp){
        this.postinbtn = false;
        this.postbtn = "posts";
      }
  }

  convertimg(){
    // get files from input
    var file = document.getElementById("file") as HTMLInputElement;
    
    if (file == null || file.files == null) {
      console.log("No file selected.");
      return;
    }

    this.fileslected = file.files[0];
    // convert to base64
    const reader = new FileReader();
    reader.readAsDataURL(this.fileslected);
    reader.onload = () => {
      this.img = reader.result as string;
    }
    console.log(this.img);
  }

  post(){
    this.titleerror = true;
    console.log(this.img);
  }
}
