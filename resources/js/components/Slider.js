import React from "react";


class Slider extends React.Component {
    state = {
        value: '50'
    }

    onValueChange = e => {
        console.log(e.currentTarget.value);
        this.setState({value: e.currentTarget.value})
        // this.setState('100')
    }


    render() {
        return (
            <div className="slider">
                <input
                    className="slider"
                    type="range"
                    min="0" max="100"
                    value={this.state.value}
                    // onChange={this.onValueChange}
                    // onChange={value => this.setState({value}, this.onValueChange)}
                    onChange={this.onValueChange}
                    step="1"/>
            </div>
        )
    }
}

export default Slider
