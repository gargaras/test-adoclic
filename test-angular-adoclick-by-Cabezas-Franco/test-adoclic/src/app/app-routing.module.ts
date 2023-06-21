import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { DogJokeComponent } from './dog-joke/dog-joke.component';

const routes: Routes = [
  { path: 'dogjoke', component: DogJokeComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
