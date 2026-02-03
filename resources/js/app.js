import "./bootstrap";
import Swal from "sweetalert2";
import TomSelect from "tom-select";
import "tom-select/dist/css/tom-select.css";

window.TomSelect = TomSelect;
window.Swal = Swal;

document.addEventListener("DOMContentLoaded", function () {
    const el = document.querySelector(".multiple");

    if (el) {
        new TomSelect(el, {
            plugins: ["remove_button"],
            maxItems: null,
            placeholder: "Pilih kategori...",
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    window.confirmation = function (url, pertanyaan = null, method = "get") {
        Swal.fire({
            title: "Yakin?",
            text: pertanyaan ? pertanyaan : "Aksi ini akan dijalankan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, lanjut",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement("form");
                form.method = "POST";
                form.action = url;
                const token = document
                    .querySelector('meta[name="csrf_token"]')
                    .getAttribute("content");
                form.innerHTML = `
        <input type="hidden" name="_token" value="${token}">
        ${method !== "POST" ? `<input type="hidden" name="_method" value="${method}">` : ""}
    `;

                document.body.appendChild(form);
                form.submit();
            }
        });
    };
});
