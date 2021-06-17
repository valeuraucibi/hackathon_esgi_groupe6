import HomePage from "../views/HomePage";
import Quiz from "../components/Quiz";
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
        path: '/quiz',
        name: 'Quiz',
        component: Quiz
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