const database = [
    { id: 1, name: 'Marcos' },
    { id: 2, name: 'João' },
    { id: 3, name: "Fulano"},
    { id: 4, name: "ciclano"}
    
  ];
  
  function search() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const resultsContainer = document.getElementById('results');
    resultsContainer.innerHTML = ''; // Limpar os resultados anteriores
  
    const filteredResults = database.filter(item => {
      return item.name.toLowerCase().includes(searchTerm);
    });
  
    if (filteredResults.length === 0) {
      resultsContainer.innerHTML = '<p>Nenhum resultado encontrado.</p>';
    } else {
      filteredResults.forEach(item => {
        const resultElement = document.createElement('div');
        resultElement.classList.add('result');
        resultElement.textContent = `ID: ${item.id}, Nome: ${item.name}`;
        resultsContainer.appendChild(resultElement);
      });
    }
  }