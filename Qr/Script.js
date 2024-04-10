document.addEventListener("DOMContentLoaded", function() {
    let qrcode = new QRCode(document.querySelector(".qrcode"));
    let courseCodeInput = document.querySelector("#courseCode");

    // Function to generate QR code based on course code 
    function generateQr() { 
        let courseCode = courseCodeInput.value.trim();
        
        if (!courseCode) { 
            alert("Course code cannot be blank!");
        } else { 
            let url = "Qr/qr_form.html?" + encodeURIComponent(courseCode); // Append the course code as a query parameter
            qrcode.clear(); // Clear existing QR code
            qrcode.makeCode(url); // Generate new QR code
            document.querySelector(".qrcode").style.display = "block"; // Show the QR code after generating
        }
    }

    // Event listener for Generate button
    document.querySelector("button").addEventListener("click", generateQr);

    // Event listener for course code input change
    courseCodeInput.addEventListener("input", generateQr);
});
