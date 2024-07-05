document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("buatjanji-form");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    // Validate inputs
    const nama = document.getElementById("nama").value.trim();
    const nomor = document.getElementById("nomor").value.trim();
    const tanggal = document.getElementById("tanggal").value.trim();

    if (nama === "" || nomor === "" || tanggal === "") {
      alert("Harap lengkapi semua kolom.");
      return;
    }
    const data = {
      nama: nama,
      nomor: nomor,
      tanggal: tanggal,
    };
    fetch("proses_janji.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((response) => response.text())
      .then((result) => {
        alert(result); // Show success or failure message
        form.reset(); // Reset form after submission
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
});
