import { Component, OnInit, OnDestroy } from '@angular/core';
import { JokeService } from '../joke.service';
import { DogImageService } from '../dog-image.service';
import { Subscription, interval } from 'rxjs';
import { switchMap } from 'rxjs/operators';

@Component({
  selector: 'app-dog-joke',
  templateUrl: './dog-joke.component.html',
  styleUrls: ['./dog-joke.component.css']
})
export class DogJokeComponent implements OnInit, OnDestroy {
  jokeSetup: string = '';
  jokePunchline: string = '';
  dogImageUrl: string = '';
  updateInterval: number = 20000; // Intervalo de actualización en milisegundos
  updateTimerSubscription: Subscription = new Subscription();
  timeRemaining: number = this.updateInterval / 1000;

  constructor(private jokeService: JokeService, private dogImageService: DogImageService) { }

  ngOnInit(): void {
    this.getJoke();
    this.getDogImage();
    this.startAutoUpdate();
  }

  ngOnDestroy(): void {
    this.stopAutoUpdate();
  }

  getJoke(): void {
    this.jokeService.getRandomJoke().subscribe(joke => {
      this.jokeSetup = joke.setup;
      this.jokePunchline = joke.punchline;
    });
  }

  getDogImage(): void {
    this.dogImageService.getRandomDogImage().subscribe(image => {
      this.dogImageUrl = image.message;
    });
  }

  startAutoUpdate(): void {
    this.updateTimerSubscription = interval(1000)
      .pipe(
        switchMap(() => {
          this.timeRemaining--;
          if (this.timeRemaining <= 0) {
            this.timeRemaining = this.updateInterval / 1000;
            this.getJoke();
            this.getDogImage();
          }
          return interval(1000);
        })
      )
      .subscribe();
  }

  stopAutoUpdate(): void {
    if (this.updateTimerSubscription) {
      this.updateTimerSubscription.unsubscribe();
    }
  }

  manualUpdate(): void {
    this.getJoke();
    this.getDogImage();
  }
}
