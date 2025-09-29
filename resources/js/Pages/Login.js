import axios from "axios";

export class Login {
    constructor() {
        this.load();
    }

    load() {
        this.events();
    }

    events() {
        let self = this;
        $("body").off("click", ".loginBtn"); // Önce varsa eski listener’ı temizle
        $("body").on("click", ".loginBtn", function () {
            self.login();
        });
    }
    async login() {
        const { data } = await axios.post("/api/login", {
            email: $(".email").val(),
            password: $(".password").val(),
        });

        if (data && data.status) {
            Swal.fire("Bilgi", data.message, "success");
        } else {
            Swal.fire("Hata", data.message, "error");
        }
    }
}
