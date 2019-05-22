import React from "react";
import CardHeader from "./card/CardHeader";
import CardBody from "./card/CardBody";
import Spacer from "./Spacer";
import CardButtons from "./card/CardButtons";
import Button from "./Button";
import Card from "./card/Card";
import {FaCheck, FaTimes} from "react-icons/fa";
import LinkButton from "./LinkButton";

const Proposition = ({category, proposition, ...props}) => (
    <Card>
        <CardHeader {...props}>
            Beantwoord de stelling
        </CardHeader>
        <CardBody flex height={300}>
            <h2>{category}</h2>
            <p>{proposition && proposition.proposition}</p>
            <Spacer/>
            <CardButtons>
                <Button success><FaCheck/> Eens</Button>
                <LinkButton to="2"><FaTimes/> Oneens</LinkButton>
            </CardButtons>
        </CardBody>
    </Card>
)

export default Proposition
