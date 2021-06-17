import HomePage from "../views/HomePage";
import Quiz from "../components/Quiz";
import QuizExperts from "../components/QuizExperts";
import QuizNovice from "../components/QuizNovice";
import Login from "../views/Login";
import Novice from "../views/Novice";
import Tuto from "../views/Tuto";

//import Profile from "../views/Profile";
//import Proposals from "../views/Proposale";

export default [
    {
        path: '*',
        redirect: "/"
    },
    {
        path: '/',
        name: 'HomePage',
        component: HomePage
    },
    {
        path: '/quiz/jeune',
        name: 'Quiz',
        component: Quiz
    },
    {
        path: '/quiz/experts',
        name: 'QuizExperts',
        component: QuizExperts
    },
    {
        path: '/quiz/novice',
        name: 'QuizNovice',
        component: QuizNovice
    },
    {
        name: "Tuto",
        path: '/tuto',
        component: Tuto
    },
    {
        name: "Login",
        path: '/login',
        component: Login,
        roles: ["anonyme"]
    },
    {
        name: "Novice",
        path: '/novice',
        component: Novice,
        roles: ["anonyme"]
    }
];