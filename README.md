# To-do App

To-do App is a web application made with:
Backend: Php, Symfony 5 and MySQL (also I used a Symfony library called Doctrine ORM)
Frontend: Vue.js and Axios

## Installation
Prerequisites: Symfony and Node installed

In a terminal, go to the main folder of the project and use the package manager npm to install all the packages needed, then do it on the vue_frontend folder.

```
npm install
```
Now you have to install Axios:

```
npm install axios
```
First you have to start MySQL (if you use Xampp or Wamp start it from there).

To run the servers open a terminal and first start Symfony in the main folder: 

```
symfony server:start
```
Now, in another terminal go to the vue_frontend folder:
```
npm run serve
```
Now everything is set up!

## Usage

Go to http://localhost:8080 in your preferred browser (Google Chrome is better regarding to the design of this app) and start adding To-dos!
You can filter them and you can mark them as "Done" or "Undone", also you can delete them.


## Regardings and problems I had

I've been having a lot of problems with my computer (it seems that Windows 10 Home has some restrictions when developing) I've spent too much time trying to solve them and finally I managed to solve them by installing Linux. Also it has been very challenging because I had to learn php deepper and Symfony from 0 (and Vue.js almost from 0).
I would have liked to add some other features as editing existent to-dos and make everything more responsive but I run out of time (besides everything took me longer than expected due to the problems mentioned before).

It has been a learning journey in many aspects so I am proud of the final result although it's far from being perfect.