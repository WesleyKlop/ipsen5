import React from 'react'
import Card from "../components/card/Card";
import CardHeader from "../components/card/CardHeader";
import CardBody from "../components/card/CardBody";
import CardButtons from "../components/card/CardButtons";
import Button from "../components/card/Button";
import Slider from "../components/Slider";

class FeedbackPage extends React.Component {


    render() {
        return (
            <>
                <div style={{flex: '1'}}/>
                <Card>
                    <CardHeader>
                        Klaar!!!
                    </CardHeader>
                    <CardBody>
                        <h2>Over de pijling</h2>
                        <p>U bent klaar met de peiling! Geef de peiling een beoordeling om door te gaan</p>
                        <Slider />
                        {/*<div className="half-circle"/>*/}
                        <CardButtons>
                            <Button className="block" >Resultaten bekijken</Button>
                        </CardButtons>
                    </CardBody>
                </Card>
                <div style={{flex: '2'}}/>
            </>
        )
    }
}
export default FeedbackPage
