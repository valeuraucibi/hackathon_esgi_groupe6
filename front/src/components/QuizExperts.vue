<template>
   <div class="d-flex justify-content-center">
       
     <div v-if="showScore">
        <h2 style="color:rgb(0, 0, 0)">
        Vous avez {{score}} / {{questions.length}}
      </h2>
     </div>
     <div class="card-q" v-else>
     <span v-if="!startQuiz">
          <b-card
          img-src="./assets/learning.jpeg"
     img-alt="Image"
     img-top
     style="max-width: 20rem;"
     class="mb-2"
         >
         <input type="checkbox" id="debug " />
<main>
	<ul id="cards">
		<li class="card" id="card_1">
			<div class="card__content"> 
				<div>
					<h2>Questionnaire experts </h2>
					<p>Testez vos connaissances météorologiques !</p>
               <b-button @click="startQuizFunc()" href="#top" class="btn">Complétez le quiz !</b-button>
				</div>
				<figure>
					<img src="https://codyhouse.co/demo-tutorials/stacking-cards/assets/img/img-1.jpg" alt="Image description">
				</figure>
			</div>
		</li>
	</ul>
</main>
     </b-card>
     </span>
     <span v-else>
     <b-card
     title="Simple Quiz Application"
     style="max-width: 20rem;"
     class="mb-2"
   
   >
  


   
   <h5 style="color:rgb(0, 0, 0)">
       Question {{currentQuestion + 1}} / {{questions.length}}
      </h5>
     <br>
    <b-progress
         variant="warning"
         :max="30"
         :value="countDown"
         height="4px"       
       ></b-progress>
   
      
       <span align="center" style="font-size: 40px; color:rgb(0, 0, 0)" ><strong>{{countDown}} </strong></span>
     
     <div>
      <h2 style="color:rgb(0, 0, 0)">
       {{questions[currentQuestion].questionText}}
     </h2>
   </div>


     <div class="answer-section">
     <b-button :key="index" v-for="(option, index) in questions[currentQuestion].answerOptions" @click="handleAnswerClick(option.isCorrect)" class="ans-option-btn" variant="primary">{{option.answerText}}</b-button>
     </div>

   </b-card>
     </span>
   </div>
   </div>
 </template>
 
 <script>
 export default {
     data(){
         return {
             currentQuestion: 0,
             showScore: false,
             score:0,
             countDown : 30,
             timer:null,
             startQuiz: false,
 
             questions : [
       {
          questionText: 'Quel est le poids du plus gros grêlon observé en France ?',
          answerOptions: [
             { answerText: '507 g', isCorrect: false },
             { answerText: '972 g', isCorrect: true },
             { answerText: '637 g', isCorrect: false },
             { answerText: '846 g', isCorrect: false },
                 
          
          ],
       },
       {
          questionText: 'Comment s’appelle la tempête française de décembre 1999 ?',
          answerOptions: [
             { answerText: 'Walter', isCorrect: false },
             { answerText: 'Barbara', isCorrect: false },
             { answerText: 'Lothar', isCorrect: true },
             { answerText: 'Filomena', isCorrect: false },
          ],
       },
       {
          questionText: 'Quelle est la puissance d’un éclair ?',
          answerOptions: [
             { answerText: '100’000’000 kW', isCorrect: false },
             { answerText: '900’000’000 kW', isCorrect: false },
             { answerText: '200’000’000 kW', isCorrect: false },
             { answerText: '500’000’000 kW', isCorrect: true },
          ],
       },
       {
          questionText: 'Quel est le record de chaleur en France ?',
          answerOptions: [
             { answerText: '50°', isCorrect: false },
             { answerText: '46°', isCorrect: true },
             { answerText: "37°", isCorrect: false },
             { answerText: '55°', isCorrect: false },
          ],
         },
         {
          questionText: 'En quelle année a été inventé le premier service météorologique français ?',
          answerOptions: [
             { answerText: '1922', isCorrect: false },
             { answerText: '1798', isCorrect: false },
             { answerText: '1854', isCorrect: true },
             { answerText: '1899', isCorrect: false },
          ],
         },
     ],
     
 
         }
     },
 
     methods:{
         startQuizFunc(){
             this.startQuiz = true
             this.countDownTimer()
         },
         handleAnswerClick(isCorrect){
             clearTimeout(this.timer);
             let nextQuestion = this.currentQuestion + 1;
             if(isCorrect){
                 this.score = this.score + 1;
             }
             if(nextQuestion < this.questions.length){
             this.currentQuestion = nextQuestion;
             // this.$store.state.questionAttended = this.currentQuestion;
             // localStorage.setItem('qattended', this.currentQuestion)
 
             this.countDown = 30;
             this.countDownTimer();
             }
             else{
                 // localStorage.removeItem('qattended')
                 this.showScore = true;
                 // localStorage.setItem('testComplete',this.showScore)
             }
 
         },
         countDownTimer() {
                 if(this.countDown > 0) {
                     this.timer = setTimeout(() => {
                         this.countDown -= 1
                         this.countDownTimer()
                     }, 1000)
                 }
                 else{
                     this.handleAnswerClick(false)
                 }
             }
     },
      created() {
         //  alert(this.$store.state.questionAttended)
         //    this.showScore = localStorage.getItem('testComplete') || false
         //    this.currentQuestion = localStorage.getItem('qattended') || 0
         //    this.countDownTimer()
         //    this.fetchQuiz()
         }
     
 }
 </script>
 
 <style scoped>
.card-body {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
        color: rgb(2, 19, 19);
        background-color: rgb(24, 5, 5);
}
 
 .ans-option-btn{
     min-width: 75%;
     font-size: 16px;
     color: #180404;
     text-align: center;
     cursor: pointer;
     margin-bottom: 5px;
 
 
 }
 .answer-section {
   padding-top: 7%;
   min-width: 100%;
   text-align: center;
   align-items: center;
   display: flex;
   flex-direction: column;
   
 }
 .timer-text {
   padding-top: 7%;
   background: rgb(0, 0, 0);
   padding: 15px;
   margin-top: 20px;
   margin-right: 20px;
   border: 5px solid rgb(0, 0, 0);
   border-radius: 15px;
   text-align: center;
 }
 
 .card-img, .card-img-top {
     border-top-left-radius: calc(0.25rem - 1px);
     border-top-right-radius: calc(0.25rem - 1px);
     height: 350px;
 }

 .card-body{
   background: rgb(10, 10, 10);
 }


 .ans-option-btn {
   width: 5%;
   font-size: 16px;
   text-align: center;
   color: #ffffff;
   background-color: #f86c7f;
   border-radius: 15px;
   padding: 8px;
   justify-content: flex-start;
 } 
 
 :root {
	--card-height: 40vw;
	--card-margin: 4vw;
	--card-top-offset: 1em;
	--numcards: 4;
	--outline-width: 0px;
}

#cards {
	padding-bottom: calc(var(--numcards) * var(--card-top-offset)); /* Make place at bottom, as items will slide to that position*/
	margin-bottom: var(--card-margin); /* Don't include the --card-margin in padding, as that will affect the scroll-timeline*/
}

#card_1 {
	--index: 1;
}

#card_2 {
	--index: 2;
}

#card_3 {
	--index: 3;
}

#card_4 {
	--index: 4;
}

.card {
	position: sticky;
	top: 0;
	padding-top: calc(var(--index) * var(--card-top-offset));
}

@supports (animation-timeline: works) {

	@scroll-timeline cards-element-scrolls-in-body {
		source: selector(body);
		scroll-offsets:
			/* Start when the start edge touches the top of the scrollport */
			selector(#cards) start 1,
			/* End when the start edge touches the start of the scrollport */
			selector(#cards) start 0
		;
		start: selector(#cards) start 1; /* Start when the start edge touches the top of the scrollport */
		end: selector(#cards) start 0; /* End when the start edge touches the start of the scrollport */
		time-range: 4s;
	}

	.card {
		--index0: calc(var(--index) - 1); /* 0-based index */
		--reverse-index: calc(var(--numcards) - var(--index0)); /* reverse index */
		--reverse-index0: calc(var(--reverse-index) - 1); /* 0-based reverse index */
	}
	
	.card__content {
		transform-origin: 50% 0%;
		will-change: transform;

		--duration: calc(var(--reverse-index0) * 1s);
		--delay: calc(var(--index0) * 1s);

		animation: var(--duration) linear scale var(--delay) forwards;
		animation-timeline: cards-element-scrolls-in-body;
	}

	@keyframes scale {
		to {
			transform:
				scale(calc(
					1.1
					-
					calc(0.1 * var(--reverse-index))
				));
		}
	}
}

/** DEBUG **/

#debug {
  position: fixed;
  top: 1em;
  left: 1em;
}
#debug::after {
  content: " Show Debug";
  margin-left: 1.5em;
  color: white;
  white-space: nowrap;
}

#debug:checked ~ main {
  --outline-width: 1px;
}


/** PAGE STYLING **/

* { /* Poor Man's Reset */
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

body {
	background: rgb(58 29 43);
	color: rgb(255, 255, 255);
	text-align: center;

	font-size: calc(1em + 0.5vw);
}

header,
main {
	width: 80vw;
	margin: 0 auto;
}

header {
	height: 100vh;
	display: grid;
	place-items: center;
}

#cards {
	list-style: none;
	outline: calc(var(--outline-width) * 10) solid blue;
	
	display: grid;
	grid-template-columns: 1fr;
	grid-template-rows: repeat(var(--numcards), var(--card-height));
	gap: var(--card-margin);
}

.card {
	outline: var(--outline-width) solid hotpink;
}

.card__content {
	box-shadow: 0 0.2em 1em rgba(0, 0, 0, 0.1), 0 1em 2em rgba(0, 0, 0, 0.1);
	background: rgb(255, 255, 255);
	color: rgb(10, 5, 7);
	border-radius: 1em;
	overflow: hidden;

	display: grid;
	grid-template-areas: "text img";
	grid-template-columns: 1fr 1fr;
	grid-template-rows: auto;

	align-items: stretch;
	outline: var(--outline-width) solid lime;
}

.card__content > div {
	grid-area: text;
	width: 80%;
	place-self: center;
	text-align: left;

	display: grid;
	gap: 1em;
	place-items: start;
}

.card__content > figure {
	grid-area: img;
	overflow: hidden;
}

.card__content > figure > img {
	width: 100%;
	height: 100%;
	object-fit: cover;
}

h1 {
	font-weight: 300;
	font-size: 3.5em;
}

h2 {
	font-weight: 300;
	font-size: 2.5em;
}

p {
	font-family: sans-serif;
	font-weight: 300;
	line-height: 1.42;
}

.btn {
	background: #f86c7f;
	color: #ffffff;
	text-decoration: none;
	display: inline-block;
	
	border-radius: 0.25em;
}

aside {
	width: 50vw;
	margin: 0 auto;
	text-align: left;
}

aside p {
	margin-bottom: 1em;
}
 </style>

 
 