import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { PostHousePageRoutingModule } from './post-house-routing.module';

import { PostHousePage } from './post-house.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    PostHousePageRoutingModule
  ],
  declarations: [PostHousePage]
})
export class PostHousePageModule {}
