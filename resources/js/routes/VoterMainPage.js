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
                <CardHeader className="yellow">
                    Login met code
                </CardHeader>
                <CardBody>
                    <input className="input" type="tel" pattern="[0-9]{6}" required autoComplete="off"
                           placeholder="Je code"
                           maxLength="6" value={this.state.loginCode} onChange={this.handleChange}/>
                    <CardButtons>
                        <Button onClick={this.loginVoter} className="block">Deelnemen</Button>
                    </CardButtons>
                </CardBody>
            </Card>
        )
    }

    handleChange = (event) => (
        this.setState({loginCode: event.target.value})
    )

    loginVoter = () => (
        console.log(this.state.loginCode)
    )
}

export default VoterMainPage
