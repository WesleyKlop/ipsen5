import React from 'react'
import Card from "../components/card/Card";
import CardHeader from "../components/card/CardHeader";
import CardBody from "../components/card/CardBody";
import CardButtons from "../components/card/CardButtons";
import Button from "../components/card/Button";

class VoterMainPage extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            loginCode: ""
        }
        this.handleChange = this.handleChange.bind(this);
    }

    render() {
        return (
            <Card>
                <CardHeader>
                    Login met code
                </CardHeader>
                <CardBody>
                    <form>
                        <input className="input" type="tel" pattern="[0-9]{6}" required autoComplete="off"
                               placeholder="Je code"
                               maxLength="6" value={this.state.loginCode} onChange={this.handleChange}/>
                        <CardButtons>
                            <Button onClick={this.loginVoter} className="block">Deelnemen</Button>
                        </CardButtons>
                    </form>
                </CardBody>
            </Card>
        )
    }

    handleChange = (event) => (
        this.setState({loginCode: event.target.value})
    )

    loginVoter = (e) => {
        e.preventDefault()
        fetch("/api/voter/login", {
            method: "POST",
            headers: {
                'Accept': 'text/plain',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                code: this.state.loginCode
            })
        })
            .then(res => res.text())
            .then(res => console.log(res))
    }
}

export default VoterMainPage
