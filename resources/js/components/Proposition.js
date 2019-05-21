import React from "react";
import CardHeader from "./card/CardHeader";
import CardBody from "./card/CardBody";
import Spacer from "./Spacer";
import CardButtons from "./card/CardButtons";
import Button from "./Button";
import Card from "./card/Card";
import {FaCheck, FaTimes} from "react-icons/fa";

const Proposition = ({category, proposition, ...props}) => (
    <Card>
        <CardHeader {...props}>
            Beantwoord de stelling
        </CardHeader>
        <CardBody flex height={300}>
            <h2>{category}</h2>
            <p>{JSON.stringify(proposition)}</p>
            <Spacer/>
            <CardButtons>
                <Button success><FaCheck/> Eens</Button>
                <Button><FaTimes/> Oneens</Button>
            </CardButtons>
        </CardBody>
    </Card>
)

export default Proposition
