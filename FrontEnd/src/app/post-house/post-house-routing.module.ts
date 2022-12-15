import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { PostHousePage } from './post-house.page';

const routes: Routes = [
  {
    path: '',
    component: PostHousePage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class PostHousePageRoutingModule {}
