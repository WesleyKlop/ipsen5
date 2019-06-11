export default class SearchField {
  _debounce = -1
  _results = []

  constructor(searchEl) {
    this.searchEl = searchEl
    this.resultEl = searchEl.parentNode.querySelector('.search-results')
    this.addListeners()
    this.hideResults()
  }

  handleSearch = async () => {
    const { value } = this.searchEl
    this._debounce = -1
    this._results = value.length < 2 ? [] : await this.fetchResults(value)
    this.showResults()
    this.fillResults()
  }

  fetchResults = async (searchTerm) => {
    return fetch(`/admin/survey/search?q=${encodeURIComponent(searchTerm)}`, {
      credentials: 'include',
      headers: {
        'Accept': 'application/json',
      },
    })
      .then(res => res.json())
  }


  addListeners = () => {
    this.searchEl.addEventListener('keyup', () => {
      if (this._debounce !== -1) {
        clearTimeout(this._debounce)
      }
      this._debounce = setTimeout(this.handleSearch, 300)
    })
    this.searchEl.addEventListener('click', this.showResults)
    document.addEventListener('click', this.hideResults)
  }

  hideResults = (e) => {
    if(typeof e !== 'undefined') {
      // Check if we're clicking inside of the results element
      if(this.resultEl.parentNode.contains(e.target)) {
        return
      }
    }
    this.resultEl.setAttribute('hidden', '')
  }

  showResults = () => {
    this.resultEl.removeAttribute('hidden')
  }

  fillResults = () => {
    this.resultEl.innerHTML = this._results.map(survey => `
      <li class="mdc-list-item"><a href="/admin/survey/${survey.id}">${survey.name}</a></li>
    `).join('')
  }
}
