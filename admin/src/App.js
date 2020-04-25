import React from 'react';
import { HydraAdmin, ResourceGuesser, CreateGuesser, EditGuesser, InputGuesser } from '@api-platform/admin';
import { ReferenceInput, AutocompleteInput } from "react-admin";

const MembersCreate = props => (
    <CreateGuesser {...props}>
        <InputGuesser source="username" />
        <InputGuesser source="firstName" />
        <InputGuesser source="lastName" />
        <InputGuesser source="email" />
        <InputGuesser source="reviews" />
    </CreateGuesser>
);

const MembersEdit = props => (
    <EditGuesser {...props}>
        <InputGuesser source="username" />
        <InputGuesser source="firstName" />
        <InputGuesser source="lastName" />
        <InputGuesser source="email" />
        <InputGuesser source="reviews" />
    </EditGuesser>
);

const ReviewsCreate = props => (
    <CreateGuesser {...props}>
        <ReferenceInput source="whisky" reference="whiskies" label="Whisky" filterToQuery={searchText => ({ name: searchText })}>
            <AutocompleteInput optionText="name" />
        </ReferenceInput>

        <InputGuesser source="glance" />
        <InputGuesser source="colour" />
        <InputGuesser source="nose" />
        <InputGuesser source="taste" />
        <InputGuesser source="finish" />
        <InputGuesser source="notes" />
        <InputGuesser source="rating" />

        <ReferenceInput source="member" reference="members" label="Member" filterToQuery={searchText => ({ username: searchText })}>
            <AutocompleteInput optionText="username" />
        </ReferenceInput>
    </CreateGuesser>
);

const ReviewsEdit = props => (
    <EditGuesser {...props}>
        <ReferenceInput source="whisky" reference="whiskies" label="Whisky" filterToQuery={searchText => ({ name: searchText })}>
            <AutocompleteInput optionText="name" />
        </ReferenceInput>

        <InputGuesser source="glance" />
        <InputGuesser source="colour" />
        <InputGuesser source="nose" />
        <InputGuesser source="taste" />
        <InputGuesser source="finish" />
        <InputGuesser source="notes" />
        <InputGuesser source="rating" />

        <ReferenceInput source="member" reference="members" label="Member" filterToQuery={searchText => ({ username: searchText })}>
            <AutocompleteInput optionText="username" />
        </ReferenceInput>
    </EditGuesser>
);

const WhiskiesCreate = props => (
    <CreateGuesser {...props}>
        <InputGuesser source="name" />
        <InputGuesser source="type" />
        <InputGuesser source="age" />
        <InputGuesser source="abv" />
        <InputGuesser source="distillery" />
        <InputGuesser source="reviews" />
    </CreateGuesser>
);

const WhiskiesEdit = props => (
    <EditGuesser {...props}>
        <InputGuesser source="name" />
        <InputGuesser source="type" />
        <InputGuesser source="age" />
        <InputGuesser source="abv" />
        <InputGuesser source="distillery" />
        <InputGuesser source="reviews" />
    </EditGuesser>
);

const DistilleriesCreate = props => (
    <CreateGuesser {...props}>
        <InputGuesser source="name" />
        <InputGuesser source="country" />
        <InputGuesser source="region" />
        <InputGuesser source="whiskies" />
    </CreateGuesser>
);

const DistilleriesEdit = props => (
    <EditGuesser {...props}>
        <InputGuesser source="name" />
        <InputGuesser source="country" />
        <InputGuesser source="region" />
        <InputGuesser source="whiskies" />
    </EditGuesser>
);

export default () => (
    <HydraAdmin entrypoint={process.env.REACT_APP_API_ENTRYPOINT}>
      <ResourceGuesser name="members" create={MembersCreate} edit={MembersEdit} />
      <ResourceGuesser name="whiskies" create={WhiskiesCreate} edit={WhiskiesEdit}  />
      <ResourceGuesser name="reviews" create={ReviewsCreate} edit={ReviewsEdit} />
      <ResourceGuesser name="distilleries" create={DistilleriesCreate} edit={DistilleriesEdit} />
    </HydraAdmin>
  );
