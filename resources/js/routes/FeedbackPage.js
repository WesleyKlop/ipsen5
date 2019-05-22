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
                        {/*<Slider />*/}
                        {/*<div className="half-circle"/>*/}
                        <div id="wrapper">
                            <svg id="meter">
                                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                                    {/*<stop offset="0%" style="stop-color:rgb(255,255,0);stop-opacity:1" />*/}
                                    {/*<stop offset="100%" style="stop-color:rgb(255,0,0);stop-opacity:1" />*/}
                                    <circle id="low" r="150" cx="50%" cy="50%" stroke="black"
                                            strokeWidth="60" strokeDasharray="471, 943" fill="none">
                                    </circle>
                                </linearGradient>
                            </svg>
                        </div>
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
