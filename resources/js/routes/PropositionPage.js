import React from 'react'
import Spacer from '../components/Spacer'
import Auth from "../Auth";
import Spinner from "../components/Spinner";
import Proposition from "../components/Proposition";

class PropositionPage extends React.Component {
    state = {
        propositions: [],
        survey: '',
        isLoaded: false,
        errorMessage: '',
        answers: [],
    }

    handleMessageClose = () => this.setState({errorMessage: ''})

    componentDidMount = () => {
        this.setState({errorMessage: ''})
        this.getSurvey()
    }

    getSurvey = () => {
        fetch('/api/survey', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + Auth.getJWT(),
            },
        })
            .then(result => result.ok ? result.json() : Promise.reject('Onjuiste gebruiker'))
            .then(result => this.setState({survey: result.name, propositions: result.propositions, isLoaded: true}))
            .catch(errorMessage => this.setState({errorMessage, isLoaded: true}))
    }

    onChoose = (e) => {
        const propositionNr = parseInt(this.props.match.params.propositionNr, 10)
        const {propositions} = this.state
        const answer = e.target.value === 'true'

        this.setState(prevState => ({
            ...prevState,
            answers: prevState.answers.concat([{
                proposition_id: propositions[propositionNr].id,
                answer
            }])
        }), () => {
            const {answers, propositions} = this.state
            if (answers.length < propositions.length)
                this.props.history.push((answers.length).toString())
            else
                this.saveAnswers()
        })
    }

    saveAnswers = () => {
        console.log(JSON.stringify(this.state.answers))
        fetch('/api/answer', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + Auth.getJWT(),
            },
            body: JSON.stringify(this.state.answers)
        })
            .then(result => result.ok ? result : Promise.reject('mhh'))
            .then(this.goToFeedback)
            .catch(errorMessage => this.setState({errorMessage}))
    }

    goToFeedback = () => {
        this.props.history.push("/feedback")
    }

    render = () => {
        return (
            <>
                <Spacer/>
                {
                    !this.state.isLoaded
                        ? <Spinner/>
                        : <Proposition
                            onChoose={this.onChoose}
                            proposition={this.state.propositions[this.props.match.params.propositionNr].proposition}
                            survey={this.state.survey}
                        />
                }
                <Spacer size={2}/>
            </>
        )
    }
}

export default PropositionPage
