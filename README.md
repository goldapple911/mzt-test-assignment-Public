
# MyZenTeam code test assignment

## Description

In this test assignment we have prepared a hiring platform where job seekers (candidates) can be found and get contacted and hired from companies' hiring managers.

The platform is free for job seekers, but not for companies.
The billing is handled by using a wallet. At the start each company has a wallet with 20 coins of credit.
These coins can be used to contact candidates and contacting a candidate will cost the company 5 coins.

On the candidates' list there is a button `Contact` and this is where a company can contact a candidate.

One of the tasks for this test assignment is to implement the `Contact a candidate` feature which should consist of the following:
when a company contacts a candidate, we should send an email to that candidate and charge the company 5 coins from its wallet.

The other feature that is part of this test assignment is to `hire a candidate`. 
When a company hires a candidate we put back 5 coins in the wallet of the company, and we send an email to the candidate with the job proposal.
In this process, we want to keep track of which company hired which candidates.

Aside from the features, we're aware that this app is far from perfect, so we'd like you to fix/improve anything that you find to be wrong or needs improvement (code, architecture, naming, readability, robustness, etc.).

While doing this test assignment, please pay attention to these aspects:

- Security - we do not want to be hacked
- Best practices - code should be clean and easy to maintain
- Documentation - provide information on how to set up the project
- Tests - test the parts that you feel necessary to
- Logic - we should not allow overspending the balance of the wallet

## Notes
- Authentication **IS NOT** in the scope of this assignment.
- The list of candidates, the company and the wallet are predefined and there is no need to create new ones.
- Always consider that the only existing company in the database is the one that contacts the job seekers (candidates)
- The emails that should be sent to the candidates can consist of only text, no design is needed


_**This app was created only for the purpose of the test assignment and code quality in this repository DOES NOT represent code quality in MyZenTeam.**_

## Get started

Use this repository as your starting point, but **DO NOT** fork it. Create a public repository on GitHub for your application source code, push it and send a link to jobs@myzenteam.com.
