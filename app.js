let addRow = document.getElementById("add-row");
addRow.addEventListener("click", function() {
    let table = document.getElementById('table').getElementsByTagName("tbody")[0];
    let newRow = table.insertRow(table.rows.lengeth);

    let namaBukuCell = newRow.insertCell(0);
    let aksiCell = newRow.insertCell(1);
    let bukuName = document.getElementById("id_buku");
    bukuName = bukuName.options[bukuName.selectedIndex].text;
    let bukuID = document.getElementById("id_buku").value;
    if(bukuID == ""){
        alert("nama buku tidak boleh kosong");
        return
    }

    namaBukuCell.innerHTML = bukuName + "<input type='hidden' name='id_buku[]' value='" + bukuID +"'>";    
    aksiCell.innerHTML = "<button type='button' onclick='deleteRow(this)' class='btn btn-sm btn-danger'>Hapus</button>";
    // alert("duar");
});

function deleteRow(button){
    let row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}