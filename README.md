# structured-data
A framework agnostic package to assist in creating valid Schema.org Json-LD.

[![Build Status](https://travis-ci.org/taskforcedev/structured-data.svg?branch=master)](https://travis-ci.org/taskforcedev/structured-data)

## Usage

The package contains a class for each (implemented) schema.org type (if the type you desire isn't implemented feel free to raise a pull request or issue).

The package is used by feeding the classes into the appropriate heirarchy, you start with your desired type, then create a jsonld object and pass your custom type in the constructor.  You then call render on your object in the appropriate place in your templates.