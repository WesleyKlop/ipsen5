import React from 'react'
import Card from "../components/card/Card";
import CardHeader from "../components/card/CardHeader";
import CardBody from "../components/card/CardBody";
import CardButtons from "../components/card/CardButtons";
import Button from "../components/card/Button";
import Slider from "../components/Slider";


class FeedbackPage extends React.Component {
    state = {
        posx: "30",
        posy: "5",
        value: "50",
        mouse: {
            x: 0,
            y: 0,
        },
    }

     polarToCartesian = (centerX, centerY, radius, angleInDegrees) => {
        const angleInRadians = (angleInDegrees-90) * Math.PI / 180.0;

        return {
            x: centerX + (radius * Math.cos(angleInRadians)),
            y: centerY + (radius * Math.sin(angleInRadians))
        };
    }

    describeArc = (x, y, radius, startAngle, endAngle) => {

        const start = this.polarToCartesian(x, y, r, endAngle);
        const end = this.polarToCartesian(x, y, r, startAngle);

        const largeArcFlag = endAngle - startAngle <= 180 ? "0" : "1";

        const d = [
            "M", start.x, start.y,
            "A", radius, radius, 0, largeArcFlag, 0, end.x, end.y
        ].join(" ");

        return d;
    }

    onMouseHandler = (e) => {
        const elementWidth = document.getElementById("wrapper").offsetWidth
        const elementLeftEdge = document.getElementById("wrapper").getBoundingClientRect().left
        document.getElementById("arc1").setAttribute("d", this.describeArc(60, 30, 25, 0, 360));
        const mousePos = e.clientX

        console.log((mousePos - elementLeftEdge) / elementWidth * 60)
        this.setState( {posx: ((mousePos - elementLeftEdge) / elementWidth * 60) })

        // this.setState({posx: elementWidth});

        // console.log(docWidth)
    };

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
                        {/*<div id="wrapper"  onMouseMove={this.onMouseHandler}>*/}
                        {/*    <svg id="meter" viewBox="0 0 60 30">*/}
                        {/*        <defs>*/}
                        {/*            <linearGradient id="linear" x1="0%" y1="0%" x2="100%" y2="0%">*/}
                        {/*                <stop offset="0%" stopColor="#e03894"/>*/}
                        {/*                <stop offset="100%" stopColor="#c7da31"/>*/}
                        {/*            </linearGradient>*/}
                        {/*        </defs>*/}
                        {/*        <circle id="low" r="25" cx="30" cy="30"*/}
                        {/*                strokeWidth="5" fill="none" stroke="url(#linear)">*/}
                        {/*        </circle>*/}
                        {/*        <path d="M 0 35 q 30 -60 60 0" stroke="blue" stroke-width="1" fill="none" />*/}
                        {/*        <circle id="pointer" r="5" cx={this.state.posx} cy={this.state.posy}*/}
                        {/*                fill="#522871">*/}
                        {/*        </circle>*/}
                        {/*    </svg>*/}
                        {/*    <h2>ontevreden tevreden</h2>*/}
                        {/*</div>*/}
                        <CardButtons>
                            <Button className="block">Resultaten bekijken</Button>
                        </CardButtons>
                    </CardBody>
                </Card>
                <div style={{flex: '2'}}/>

            </>
        )
    }

}

export default FeedbackPage
