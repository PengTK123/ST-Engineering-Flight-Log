document.addEventListener("DOMContentLoaded", () => {
    fetch("read-logs.php")
        .then(response => response.json())
        .then(data => {
            const table = document.getElementById("flightLogsTable");
            data.forEach(log => {
                const row = table.insertRow();
                row.innerHTML = `
                    <td>${log.tailNumber}</td>
                    <td>${log.flightID}</td>
                    <td>${log.takeoff}</td>
                    <td>${log.landing}</td>
                    <td>${log.duration}</td>
                `;
            });
        });
});