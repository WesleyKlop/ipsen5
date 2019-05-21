import React from "react";
import Proposition from "./Proposition";

const PropositionList = ({proposition, propositions, ...props}) => (
    <Proposition category='test' proposition={propositions[proposition]}/>
)

export default PropositionList
