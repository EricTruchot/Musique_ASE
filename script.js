document.getElementById('conneClick').addEventListener('click', () => {
    document.getElementById('connection').style.display = 'flex'
    document.getElementById('inscription').style.display = 'none'
})

document.getElementById('insClick').addEventListener('click', () => {
    document.getElementById('inscription').style.display = 'flex'
    document.getElementById('connection').style.display = 'none'
})