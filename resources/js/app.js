import { Loader } from "./loader";
import { Login } from "./Pages/Login";

document.addEventListener("DOMContentLoaded", () => {
    // Login alert çalışsın
    new Login();

    // App başlat
    window.app = new App();
});

export class App {
    constructor() {
        this.loader = new Loader();
        setTimeout(() => {
            this.loader.load(this.geturl());
        }, 50);

        this.events();
    }

    events() {}

    geturl() {
        let url = window.location.href;
        url = url
            .replaceAll("#", "")
            .replaceAll("!", "")
            .split(window.location.hostname);
        url = url[1].split("?");
        url = url[0].split("/");
        if (url.length > 1) url = url.splice(1, url.length - 1);
        return url;
    }
}
